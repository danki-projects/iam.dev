<div class="row">
    @if (Auth::check())
        <div class="col-12">
            <form action="{{ route('blog.comment', [$post->category->slug, $post->slug]) }}" method="post">
                @csrf
                <div class="row align-items-center">
                    <div class="col-12 col-md-2 text-center">
                            <span class="d-none d-md-block">
                            <img src="{{ Auth::user()->cover }}"
                                 class="rounded-circle"
                                 alt="{{ Auth::user()->full_name }}"
                                 title="{{ Auth::user()->full_name }}" width="75">
                            </span>
                    </div>
                    <div class="col-12 col-md-10">
                        <div class="form-group">
                            <label for="comment" class="text-muted">
                                <small>Escreva algo para comentar.</small>
                            </label>
                            <textarea name="comment" required minlength="3" maxlength="300" id="comment"
                                      class="form-control" rows="2"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 d-flex justify-content-end">
                        <div class="form-group form-inline mr-2">
                            <label for="stars" class="mr-2">Nota </label>
                            <select name="stars" id="stars" class="custom-select custom-select-sm" style="width: 60px">
                                <option value="1" selected>1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-dark btn-sm">Enviar comentário</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    @else
        <div class="col-12 mt-2 mb-4">
            <div class="text-center">
                Faça o
                <a class="btn btn-purple btn-sm text-white" href="{{ route('login') }}">Login</a>
                ou
                <a href="{{ route('register') }}" class="btn btn-light btn-sm">cadastre-se</a> para comentar.
            </div>
        </div>
    @endif

</div>
