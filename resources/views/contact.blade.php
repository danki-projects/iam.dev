@extends('layouts.main')

@section('content')
    <h1 class="h3">{{ __('app.contact') }}</h1>
    <div class="p-0 p-lg-3">
        <div class="row">
            <div class="col-12 col-lg-6 p-4 p-lg-5 bg-light text-dark">
                <form action="{{ route('contact.store') }}" method="post">
                    @csrf
                    <p>Preencha o formulário abaixo para entrar em contato comigo via e-mail.</p>
                    <div class="form-group">
                        <label for="email">{{ __('inputs.email_address') }}</label>
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
                        <label for="name">{{ __('inputs.name') }}</label>
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
                        <label for="message">{{ __('inputs.message') }}</label>
                        <textarea name="message"
                                  class="form-control {{ $errors->first('message') ? 'is-invalid' : '' }}"
                                  id="message"
                                  rows="5"
                                  placeholder="{{ __('inputs.placeholder.contact_message') }}"></textarea>
                        <div class="invalid-feedback">
                            {{ $errors->first('message') }}
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('inputs.button_send_contact') }}</button>
                </form>
            </div>
            <div class="col-12 col-lg-6 shadow p-5 rounded mt-3 mt-md-0">
                <p>Me encontre nas redes</p>
                <ul>
                    <li>Github</li>
                    <li>Instagram</li>
                    <li>Linkedin</li>
                    <li>Youtube</li>
                </ul>
                <p class="text-info my-0"><strong>Email:</strong> rafael@dankicode.com.br</p>
                <p class="text-info my-0"><strong>Telefone:</strong> comercial: 11 9 9999-9999</p>
            </div>
        </div>
    </div>
@endsection
