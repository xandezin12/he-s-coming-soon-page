$(function() {
    // Data futura para o countdown (50 dias a partir de hoje)
    var today = new Date();
    var futureDate = new Date(today.getTime() + (50 * 24 * 60 * 60 * 1000));
    var endDate = futureDate.toLocaleDateString('en-US', {
        month: 'long',
        day: 'numeric', 
        year: 'numeric'
    }) + " 12:00:00";

    // Countdown estilizado
    $('.countdown.styled').countdown({
        date: endDate,
        render: function(data) {
            $(this.el).html(
                "<div>" + this.leadingZeros(data.days, 2) + " <span>dias</span></div>" +
                "<div>" + this.leadingZeros(data.hours, 2) + " <span>horas</span></div>" +
                "<div>" + this.leadingZeros(data.min, 2) + " <span>min</span></div>" +
                "<div>" + this.leadingZeros(data.sec, 2) + " <span>seg</span></div>"
            );
        }
    });

    // Validação e envio do formulário
    $('.subscription-form').on('submit', function(e) {
        e.preventDefault();
        var email = $(this).find('input[type="email"]').val();
        var button = $(this).find('button');
        
        if (!email || !email.includes('@')) {
            alert('Por favor, insira um endereço válido.');
            return;
        }
        
        button.text('CONNECTING...').prop('disabled', true);
        
        $.ajax({
            url: 'api/subscribe.php',
            method: 'POST',
            contentType: 'application/json',
            data: JSON.stringify({ email: email }),
            success: function(response) {
                alert('Welcome to The Aether Order! You will receive exclusive communications.');
                $('input[type="email"]').val('');
            },
            error: function() {
                alert('Connection failed. The Order will try again later.');
            },
            complete: function() {
                button.text('ESTABLISH CONTACT').prop('disabled', false);
            }
        });
    });
});