<?php

namespace App\Http\Controllers;

use App\Entitis\Animals;
use App\Entitis\Helpers;

use App\Http\Requests;
use App\Http\Requests\ContactFormRequest;
use App\Entitis\Notes;
use App\Repositories\AnimalRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\EloquentTask;
use App\Repositories\HelperRepository;
use App\Repositories\NotesRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;


class TasksController extends Controller
{
    private $todo;
    private $notesRepository;

    /**
     * TasksController constructor.
     * @param EloquentTask $todo
     */
    public function __construct(EloquentTask $todo, NotesRepository $notesRepository, AnimalRepository $animalRepository, CategoryRepository $categoryRepository, HelperRepository $helperRepository)
    {
        $this->notesRepository = $notesRepository;
        $this->animalRepository = $animalRepository;
        $this->categoryRepository = $categoryRepository;
        $this->helperRepository = $helperRepository;
        $this->todo = $todo;
        $this->middleware('auth');


    }

    public function getAllTasks()
    {
        $users = $this->todo->getAll();
        foreach ($users as $user){
            echo $user->name . "<hr>";
        }

    }

    public function getAllNotes()
    {
        $notes = $this->notesRepository->getAll();
        foreach ($notes as $note){
            echo $note->name . "<br>";
        }
    }

    public function chooser(Request $request)
    {
Session::put('locale', $request->get('locale'));
        return Redirect::back();

    }
    
    /**
     * function which return view of task
     * 
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('tasks.task');
    }

   
    /**
     * function which return site of task1
     * 
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function work()
    {
        $animals = $this->animalRepository->getAll();

        return view('tasks.task1', ['animals' => $animals]);
    }

    /**
     * function which return site of site1
     * 
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('tasks.site1');
    }
    
    public function cats()
    {
        return view('tasks.cats');
    }
    
    public function parrot()
    {
        return view('tasks.parrot');
    }
    
    public function showAnimal($id)
    {
        $animal = $this->animalRepository->getById($id);
        return view('tasks.animals', ['animal' => $animal]);
    }

    /**
     * @return mixed
     */
    public function getAllCategories()
    {
        $names = $this->categoryRepository->getAll();
        return view('tasks.task1', ['name' => $names]);



    }

    /**
     * @return mixed
     */
    public function getAllCats()
    {
        $animals = $this->animalRepository->getCats();

        return view('tasks.cats', ['animals' => $animals]);


    }

    /**
     * @return mixed
     */
    public function getAllDogs()
    {
        $animals = $this->animalRepository->getDogs();

        return view('tasks.task1', ['animals' => $animals]);


    }

    /**
     * @return mixed
     */
    public function getAllParrots()
    {
        $animals = $this->animalRepository->getParrots();

        return view('tasks.parrot', ['animals' => $animals]);


    }
    
    public function showAnimalByCategory($id)
    {
        $animals = $this->animalRepository->getAnimalsByCategory($id);
        return view('tasks.parrot', ['animals' => $animals]);
        
        
    }

    /**
     * @return mixed
     */
    public function getAllHelpers()
    {
        $emails = $this->categoryRepository->getAll();
        return view('tasks.task1', ['email' => $emails]);

    }
    


    /**
     * @param ContactFormRequest $request
     * @return mixed
     */
    public function store(ContactFormRequest $request)
    {
        $user= new Notes;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->message=$request->message;
        $user->save();

        return view('tasks.site1', compact('request'));
        
    }

    /**
     * @param HelperFormRequest $request
     * @return mixed
     */
    public function hold(Requests\HelperFormRequest $request, $animalId)
    {
        $helper=new Helpers();
        $helper->email=$request->email;
        $helper->save();

        DB::table('animals_helpers')->insert([
            'animal_id' =>  $animalId,
            'helper_id' =>  $helper->id
        ]);

        return back();
    }

}
