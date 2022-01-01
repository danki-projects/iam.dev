<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\repositories\ContactsRepository;

class ContactController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('contact');
    }

    /**
     * @param ContactRequest $request
     * @param ContactsRepository $contactsRepository
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ContactRequest $request, ContactsRepository $contactsRepository): \Illuminate\Http\RedirectResponse
    {
        $contactsRepository->sendContactFromSite(
            $request->get('name'),
            $request->get('email'),
            $request->get('message')
        );
        messages('Tudo certo!', 'Seu contato foi enviado com sucesso.', 'success');
        return redirect()->back();
    }
}
