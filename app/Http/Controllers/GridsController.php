<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\GridCreateRequest;
use App\Http\Requests\GridUpdateRequest;
use App\Repositories\GridRepository;
use App\Validators\GridValidator;
use App\Models\Professor;
use DB;

/**
 * Class GridsController.
 *
 * @package namespace App\Http\Controllers;
 */
class GridsController extends Controller
{
    /**
     * @var GridRepository
     */
    protected $repository;

    /**
     * @var GridValidator
     */
    protected $validator;

    /**
     * GridsController constructor.
     *
     * @param GridRepository $repository
     * @param GridValidator $validator
     */
    public function __construct(GridRepository $repository, GridValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $professors  = Professor::all();
        /*foreach($professors as $professor){
            foreach($professor->cursos as $curso){
                dd($curso->students);
            }  
        }*/

        return view('grid.index', compact('professors'));
    }

    public function indexSecretario()
    {
        
        $professors  = Professor::all();

        return view('grid.secretario', compact('professors'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  GridCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(GridCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $grid = $this->repository->create($request->all());

            $response = [
                'message' => 'Grid created.',
                'data'    => $grid->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $grid = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $grid,
            ]);
        }

        return view('grids.show', compact('grid'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $grid = $this->repository->find($id);

        return view('grid.edit', compact('grid'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  GridUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(GridUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $grid = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Grid updated.',
                'data'    => $grid->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Grid deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Grid deleted.');
    }
}
