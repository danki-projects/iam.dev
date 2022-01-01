@component('mail::message')
    <h1>Olá Danki!</h1>
    <p>Você acaba de receber um contato vindo do site</p>
    <h2><small>Confira os detalhes abaixo:</small></h2>
    <div class="table">
        <table>
            <tbody>
            <tr>
                <td><strong>Nome</strong></td>
                <td>{{ $name }}</td>
            </tr>
            <tr>
                <td><strong>Email</strong></td>
                <td>{{ $email }}</td>
            </tr>
            <tr>
                <td><strong>Mensagem</strong></td>
                <td>{{ $message_text }}</td>
            </tr>
            </tbody>
        </table>
    </div>
@endcomponent
