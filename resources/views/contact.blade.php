@extends('layouts.main')

@section('content')
    <div class="container py-5">
        <h1 class="h2 text-purple font-weight-bolder">{{ __('app.contact') }}</h1>
        <div class="py-5 p-lg-3">
            <div class="row">
                <div class="col-12 col-lg-6 p-4 p-lg-5 bg-light text-dark">
                    <form action="{{ route('contact.store') }}" method="post">
                        @csrf
                        <p class="font-weight-bold text-light-gray">
                            Preencha o formulário abaixo para entrar em contato comigo via e-mail.
                        </p>
                        <div class="form-group">
                            <label for="email" class="text-light-gray">{{ __('inputs.email_address') }}</label>
                            <input type="email"
                                   name="email"
                                   class="form-control {{ $errors->first('email') ? 'is-invalid' : '' }}"
                                   id="email"
                                   value="{{ Auth::user()->email ?? '' }}"
                                   placeholder="{{ __('inputs.placeholder.contact_email') }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="text-light-gray">{{ __('inputs.name') }}</label>
                            <input type="text"
                                   name="name"
                                   class="form-control {{ $errors->first('name') ? 'is-invalid' : '' }}"
                                   id="name"
                                   value="{{ Auth::user()->full_name ?? '' }}"
                                   placeholder="{{ __('inputs.placeholder.contact_name') }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="message" class="text-light-gray">{{ __('inputs.message') }}</label>
                            <textarea name="message"
                                      class="form-control {{ $errors->first('message') ? 'is-invalid' : '' }}"
                                      id="message"
                                      rows="5"
                                      placeholder="{{ __('inputs.placeholder.contact_message') }}"></textarea>
                            <div class="invalid-feedback">
                                {{ $errors->first('message') }}
                            </div>
                        </div>
                        <button type="submit" class="btn btn-purple text-white">
                            {{ __('inputs.button_send_contact') }}
                        </button>
                    </form>
                </div>
                <div class="col-12 col-lg-6 p-5 mt-3 mt-md-0 bg-purple text-white">
                    <p>Me encontre nas redes</p>
                    <ul>
                        <li>Github</li>
                        <li>Instagram</li>
                        <li>Linkedin</li>
                        <li>Youtube</li>
                    </ul>
                    <p class="text-white my-0"><strong>Email:</strong> rafael@dankicode.com.br</p>
                    <p class="text-white my-0"><strong>Telefone:</strong> comercial: 11 9 9999-9999</p>
                </div>
            </div>
        </div>
    </div>
@endsection
