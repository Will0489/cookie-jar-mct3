<?php

class QuestionController extends \BaseController {

	public function index()
	{
        $data = Auth::user();
        $questions = Question::where('answered', '=','0')->with('user', 'categories')->get();

		return View::make('questions.overview', compact('data', 'questions'));
	}

    public function help($id)
    {
        $helper = Auth::user();
        $question = Question::find($id)->with('user')->first();

        // Check if there is an existing conversation for this question with this helper, if so, redirect to messages
        $conversation = Conversation::where('question_id', '=', $question->id)->where('user_id', '=', $helper->id)->first();

        // If not, create a new conversation with this helper for the given question and send initial message, then redirect to messages
        if($conversation === null)
        {
            $conversation = Conversation::create([
                'question_id' => $question->id,
                'owner_id' => $question->user->id,
                'user_id' => $helper->id,
                'started_on' => null,
                'archived' => 0
            ]);

            $initial_message = Message::create([
                'content' => 'Hey there, I can help you with "' . $question->title . '"!',
                'sender_id' => $helper->id,
                'conversation_id' => $conversation->id,
                'date_sent' => null
            ]);
        }

        return Redirect::to('/messages');

    }

    public function done($id)
    {
        $question = Question::find($id);

        // Check if the person sending this request is actually the owner
        if($question->user_id == Auth::id())
        {
            $question->answered = 1;
            $question->save();

            return Redirect::back()->with('message', 'Your question has been marked as done!');
        }
        else
        {
            return Redirect::back()->withErrors('You tried to mark a question as done that doesn\'t belong to you!');
        }


    }

	public function create()
	{
        if (Auth::user()) {
            $data = Auth::user();
            return View::make('questions.new', compact('data'));
        }
        else
        {
            return View::make('error.guest');
        }
	}

	public function store()
    {
        $data = Input::all();
        $user = Auth::id();
        $question = new Question();

        $rules = [
            'title' => 'required',
            'body' => 'required|max:300',
            'deadline' => 'required'
        ];
        $feedback = [
            'title.required' => 'You need to enter a title.',
            'body.required' => 'You should add some information first.',
            'body.max:300' => 'Your additional info can not be more than 300 characters.',
            'deadline.required' => 'You need to specify a deadline date.'
        ];

        $validator = Validator::make(Input::all(), $rules, $feedback);

        if($validator->fails())
        {
            return Redirect::back()->withInput()->withErrors($validator);
        }
        elseif(!isset($data['tagvalues']))
        {
            return Redirect::back()->withInput()->withErrors('Please enter at least one tag for your questions.');
        }
        else
        {
            $data['deadline'] = str_replace('/', '-', $data['deadline']);
            $question = Question::create([
                'title' => $data['title'],
                'body' => $data['body'],
                'user_id' => $user,
                'answered' => 0,
                'deadline' => date('Y-m-d', strtotime($data['deadline']))
            ]);
            foreach($data['tagvalues'] as $tag)
            {
                //TODO: Iterate over tag array and create questionscategorieslink entry or new categories

                /* If the value is a number, create a new link based on the category id
                 * else create a new category based on the text value, store it and
                 * use it in the creation of a new link afterwards.
                 */
                if(is_numeric($tag)) {
                    QuestionsCategoriesLink::create([
                        'question_id' => $question->id,
                        'category_id' => $tag
                    ]);
                } else {
                    $category = Category::create([
                        'name' => $tag,
                        'image_url' => null,
                        'description' => ''
                    ]);

                    QuestionsCategoriesLink::create([
                        'question_id' => $question->id,
                        'category_id' => $category->id
                    ]);
                }
            }
        }
        return Redirect::to('/questions');
	}

	public function show($id)
	{
        $data = Auth::user();
        $question = Question::find($id);

        return View::make('questions.detail', compact('question', 'data'));
	}

    public function tags()
    {
        $term = Input::get('term');
        $tags = array();

        $query = Category::where("name", "LIKE", "$term%")->get();

        foreach($query as $results => $tag)
        {
            $tags[] = array(
                'id' => $tag->id,
                'label' => Str::lower($tag->name),
                'value' => $tag->id);
        }

        return Response::json($tags);
    }

    public function edit($id)
    {
        $data = Auth::user();
        $question = Question::find($id);
        return View::make('questions.edit', compact('question', 'data'));
    }

    public function update()
    {
        $data = Input::all();
        $user = Auth::id();
        $question = Question::find($data['question_id']);
        $data['deadline'] = str_replace('/', '-', $data['deadline']);
        //Check if the currently logged on user is the actual question owner
        if($user == $question->user_id)
        {
            $question->title = $data['title'];
            $question->body = $data['body'];
            $question->deadline = date('Y-m-d', strtotime($data['deadline']));
            $question->save();

            if(isset($data['tagvalues']))
            {
                foreach ($data['tagvalues'] as $tag)
                {
                    if (is_numeric($tag)) {
                        $question->categories()->attach($tag);
                    } else {
                        $category = Category::create([
                            'name' => $tag,
                            'image_url' => null,
                            'description' => ''
                        ]);

                        $question->categories()->attach($category->id);
                    }
                }
            }
            if(isset($data['delvalues'])) {
                foreach ($data['delvalues'] as $tag) {
                    if (is_numeric($tag)) {
                        $question->categories()->detach($tag);
                    }
                }
            }
            return Redirect::back()->with('message', 'Your question has been updated.');
        }
        else
        {
            return Redirect::back()->withErrors(['You are not the owner of this question!']);
        }
    }

    public function delete($id)
    {
        //TODO: Implement soft delete
        $question = Question::findOrFail($id);
        $user = Auth::id();

        if($user == $question->user_id) {
            $question->delete();

            return Redirect::back()->with('message', 'Your question has been removed.');
        }
        else
        {
            return Redirect::back()->withErrors(['You are not the owner of this question!']);
        }
    }
}
