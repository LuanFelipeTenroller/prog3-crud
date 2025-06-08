document.addEventListener('DOMContentLoaded', function () {
    
    const form = document.getElementById('formLogin');
    if (!form) {
        console.error('Formulário não encontrado!');
        return;
    }

    form.addEventListener('submit', async function (e) {
        e.preventDefault();
        console.log('Submit capturado, enviando login...');

        const email = form.querySelector('input[name="email"]').value;
        const senha = form.querySelector('input[name="senha"]').value;
        console.log('Dados capturados:', { email, senha });

        try {
            const response = await fetch(window.appConfig.loginUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ email, senha }),
            });

            console.log('Resposta do fetch:', response);
            console.log('Status da resposta:', response.status);

            if (!response.ok) {
                const error = await response.json();
                console.error('Erro recebido:', error);
                alert(error.error || 'Erro no login');
                return;
            }

            const data = await response.json();
            if (data.token) {
                localStorage.setItem('token', data.token);
                window.location.href = window.appConfig.baseUrl || "/";
            } else {
                alert('Token não recebido!');
            }
        } catch (err) {
            alert('Erro ao se conectar com o servidor');
            console.error(err);
        }
    });

});
