<?php

class QuestionController extends \BaseController {

	public function index()
	{
        $data = Auth::user();
        $questions = Question::where('answered', '=','0')->with('user','questioncategories');

		return View::make('questions.overview', compact('data', 'questions'));
	}

	public function create()
	{
        $data = Auth::user();
		return View::make('questions.new', compact('data'));
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
        return Redirect::back();
	}

	public function show($id)
	{
        $question = Question::find($id);

        return View::make('questions.detail', compact('question'));
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
}
