<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateordertailRequest;
use App\Http\Requests\UpdateordertailRequest;
use App\Repositories\ordertailRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ordertailController extends AppBaseController
{
    /** @var ordertailRepository $ordertailRepository*/
    private $ordertailRepository;

    public function __construct(ordertailRepository $ordertailRepo)
    {
        $this->ordertailRepository = $ordertailRepo;
    }

    /**
     * Display a listing of the ordertail.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $ordertails = $this->ordertailRepository->all();

        return view('ordertails.index')
            ->with('ordertails', $ordertails);
    }

    /**
     * Show the form for creating a new ordertail.
     *
     * @return Response
     */
    public function create()
    {
        return view('ordertails.create');
    }

    /**
     * Store a newly created ordertail in storage.
     *
     * @param CreateordertailRequest $request
     *
     * @return Response
     */
    public function store(CreateordertailRequest $request)
    {
        $input = $request->all();

        $ordertail = $this->ordertailRepository->create($input);

        Flash::success('Ordertail saved successfully.');

        return redirect(route('ordertails.index'));
    }

    /**
     * Display the specified ordertail.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ordertail = $this->ordertailRepository->find($id);

        if (empty($ordertail)) {
            Flash::error('Ordertail not found');

            return redirect(route('ordertails.index'));
        }

        return view('ordertails.show')->with('ordertail', $ordertail);
    }

    /**
     * Show the form for editing the specified ordertail.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $ordertail = $this->ordertailRepository->find($id);

        if (empty($ordertail)) {
            Flash::error('Ordertail not found');

            return redirect(route('ordertails.index'));
        }

        return view('ordertails.edit')->with('ordertail', $ordertail);
    }

    /**
     * Update the specified ordertail in storage.
     *
     * @param int $id
     * @param UpdateordertailRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateordertailRequest $request)
    {
        $ordertail = $this->ordertailRepository->find($id);

        if (empty($ordertail)) {
            Flash::error('Ordertail not found');

            return redirect(route('ordertails.index'));
        }

        $ordertail = $this->ordertailRepository->update($request->all(), $id);

        Flash::success('Ordertail updated successfully.');

        return redirect(route('ordertails.index'));
    }

    /**
     * Remove the specified ordertail from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $ordertail = $this->ordertailRepository->find($id);

        if (empty($ordertail)) {
            Flash::error('Ordertail not found');

            return redirect(route('ordertails.index'));
        }

        $this->ordertailRepository->delete($id);

        Flash::success('Ordertail deleted successfully.');

        return redirect(route('ordertails.index'));
    }
}
