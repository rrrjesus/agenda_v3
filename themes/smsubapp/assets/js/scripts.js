$(document).ready(function() {

    $.validator.setDefaults({
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
            $(element).addClass('is-valid');
        },

        // errorElement: 'span',
        errorClass: 'help-block',

        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            if (element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            }
            else if (element.prop('type') === 'radio' && element.parent('.radio-inline').length) {
                error.insertAfter(element.parent().parent());
            }
            else if (element.prop('type') === 'checkbox' || element.prop('type') === 'radio') {
                error.appendTo(element.parent().parent());
            }
            else if (element.prop('type') === 'password') {
                error.appendTo(element.parent());
            }
            else if (element.prop('type') === 'file') {
                error.appendTo(element.parent());
            }
            if (element.parent('select').length) {
                error.insertAfter(element.parent());
            }
            else {
                error.insertAfter(element);
            }
        }
    });

    $("#contact-register").validate({
        rules: {
            sector: {
                required: true
                // remote: "remote/valida-email.php"
            },
            collaborator: {
                required: true
            },
            ramal: {
                required: true,
                maxlength: 4
            }
        },
        messages: {
            sector: {
                required: "Digite o setor !!!"
                // remote: "Email não encontrado !!!"
            },
            collaborator: {
                required: "Digite o nome !!!"
            },
            ramal: {
                required: "Digite o ramal !!!",
                maxlength: "Ramais possuem apenas 4 dígitos !!!"
            }
        }
    });

    $("#sector-register").validate({
        rules: {
            sector: {
                required: true
            }
        },
        messages: {
            sector: {
                required: "Digite o setor !!!"
            }
        }
    });

    $("#contact-edit").validate({
        rules: {
            sector: {
                required: true
                // remote: "remote/valida-email.php"
            },
            collaborator: {
                required: true
            },
            ramal: {
                required: true
            }
        },
        messages: {
            sector: {
                required: "Digite o setor !!!"
                // remote: "Email não encontrado !!!"
            },
            collaborator: {
                required: "Digite o nome !!!"
            },
            ramal: {
                required: "Digite o ramal !!!"
            }
        }
    });

    $("#user-updated").validate({
        rules: {
            first_name: {
                required: true
                // remote: "remote/valida-email.php"
            },
            last_name: {
                required: true
            },
            email: {
                required: true
            },
            functional_record: {
                required: true
            }
        },
        messages: {
            first_name: {
                required: "Digite o nome !!!"
                // remote: "Email não encontrado !!!"
            },
            last_name: {
                required: "Digite o sobrenome !!!"
            },
            email: {
                required: "Digite o e-mail !!!"
            },
            functional_record: {
                required: "Digite o RF !!!"
            }
        }
    });

    $("#user-profile").validate({
        rules: {
            first_name: {
                required: true
                // remote: "remote/valida-email.php"
            },
            last_name: {
                required: true
            },
            email: {
                required: true
            },
            functional_record: {
                required: true
            }
        },
        messages: {
            first_name: {
                required: "Digite o nome !!!"
                // remote: "Email não encontrado !!!"
            },
            last_name: {
                required: "Digite o sobrenome !!!"
            },
            email: {
                required: "Digite o e-mail !!!"
            },
            functional_record: {
                required: "Digite o RF !!!"
            }
        }
    });

    //  data-bs-toggle="tooltip" Bootstrap Title
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-togglee="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })

    //ajax form
    $("form:not('.ajax_off')").submit(function (e) {
        e.preventDefault();
        var form = $(this);
        var load = $(".ajax_load");
        var flashClass = "ajax_response";
        var flash = $("." + flashClass);

        form.ajaxSubmit({
            url: form.attr("action"),
            type: "POST",
            dataType: "json",
            beforeSend: function () {
                load.fadeIn(200).css("display", "flex");
            },
            success: function (response) {
                //redirect
                if (response.redirect) {
                    window.location.href = response.redirect;
                }

                //message
                if (response.message) {
                    if (flash.length) {
                        flash.html(response.message).fadeIn(100).effect("bounce", 300);
                    } else {
                        form.prepend("<div class='" + flashClass + "'>" + response.message + "</div>")
                            .find("." + flashClass).effect("bounce", 300);
                    }
                } else {
                    flash.fadeOut(100);
                }
            },
            complete: function () {
                load.fadeOut(200);

                if (form.data("reset") === true) {
                    form.trigger("reset");
                }
            }
        });
    })
});