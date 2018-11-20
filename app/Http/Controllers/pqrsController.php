<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatepqrsRequest;
use App\Http\Requests\UpdatepqrsRequest;
use App\Repositories\pqrsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class pqrsController extends AppBaseController
{
    /** @var  pqrsRepository */
    private $pqrsRepository;

    public function __construct(pqrsRepository $pqrsRepo)
    {
        $this->pqrsRepository = $pqrsRepo;
    }

    /**
     * Display a listing of the pqrs.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->pqrsRepository->pushCriteria(new RequestCriteria($request));
        $pqrs = $this->pqrsRepository->all();

        return view('pqrs.index')
            ->with('pqrs', $pqrs);
    }

    /**
     * Show the form for creating a new pqrs.
     *
     * @return Response
     */
    public function create()
    {
        return view('pqrs.create');
    }

    /**
     * Store a newly created pqrs in storage.
     *
     * @param CreatepqrsRequest $request
     *
     * @return Response
     */
    public function store(CreatepqrsRequest $request)
    {
        $input = $request->all();

        $pqrs = $this->pqrsRepository->create($input);

        Flash::success('Pqrs saved successfully.');

        return redirect(route('pqrs.index'));
    }

    /**
     * Display the specified pqrs.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pqrs = $this->pqrsRepository->findWithoutFail($id);

        if (empty($pqrs)) {
            Flash::error('Pqrs not found');

            return redirect(route('pqrs.index'));
        }

        return view('pqrs.show')->with('pqrs', $pqrs);
    }

    /**
     * Show the form for editing the specified pqrs.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pqrs = $this->pqrsRepository->findWithoutFail($id);

        if (empty($pqrs)) {
            Flash::error('Pqrs not found');

            return redirect(route('pqrs.index'));
        }

        return view('pqrs.edit')->with('pqrs', $pqrs);
    }

    /**
     * Update the specified pqrs in storage.
     *
     * @param  int              $id
     * @param UpdatepqrsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatepqrsRequest $request)
    {
        $pqrs = $this->pqrsRepository->findWithoutFail($id);

        if (empty($pqrs)) {
            Flash::error('Pqrs not found');

            return redirect(route('pqrs.index'));
        }

        $pqrs = $this->pqrsRepository->update($request->all(), $id);

        Flash::success('Pqrs updated successfully.');

        return redirect(route('pqrs.index'));
    }

    /**
     * Remove the specified pqrs from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pqrs = $this->pqrsRepository->findWithoutFail($id);

        if (empty($pqrs)) {
            Flash::error('Pqrs not found');

            return redirect(route('pqrs.index'));
        }

        $this->pqrsRepository->delete($id);

        Flash::success('Pqrs deleted successfully.');

        return redirect(route('pqrs.index'));
    }
}
