    <!-- FontAwesome JS-->
    <script type="text/javascript">
        window.onload = function() {
            $('#cpf').mask('000.000.000-00');
            var SPMaskBehavior = function (val) {
                return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
            },
            spOptions = {
                onKeyPress: function(val, e, field, options) {
                    field.mask(SPMaskBehavior.apply({}, arguments), options);
                }
            };
            $('#telefone').mask(SPMaskBehavior, spOptions);
            $('.telefone').mask(SPMaskBehavior, spOptions);
            $('.date').mask('00/00/0000');
            $('.time').mask('00:00');
            $('.cep').mask('00000-000');
        };
    </script>
    <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js" integrity="sha384-0pzryjIRos8mFBWMzSSZApWtPl/5++eIfzYmTgBBmXYdhvxPc+XcFEk+zJwDgWbP" crossorigin="anonymous">
    </script>

    <!-- Boostrap JS -->
    <script type="text/javascript" src="<?= base_url('public/jQuery/jquery-3.4.1.min.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('public/jQuery-Mask/dist/jquery.mask.min.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('public/bootstrap/js/bootstrap.min.js') ?>"></script>

    
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/plug-ins/1.10.20/i18n/Portuguese-Brasil.json"></script>

    <script>
        $.validate({
            lang : 'pt',
            modules : 'brazil, security, date',
            onModulesLoaded : function() {
                var optionalConfig = {
                    fontSize: '12pt',
                    padding: '4px',
                    bad : 'Muito Fraca',
                    weak : 'Fraca',
                    good : 'Boa',
                    strong : 'Forte'
                };

                $('input[name="senha"]').displayPasswordStrength(optionalConfig);
            }
        });

    
        $(document).ready( function () {
            $('.tabela').DataTable({
                "language": {
                    "sEmptyTable": "Nenhum registro encontrado",
                    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sInfoThousands": ".",
                    "sLengthMenu": "_MENU_ resultados por página",
                    "sLoadingRecords": "Carregando...",
                    "sProcessing": "Processando...",
                    "sZeroRecords": "Nenhum registro encontrado",
                    "sSearch": "Pesquisar",
                    "oPaginate": {
                        "sNext": "Próximo",
                        "sPrevious": "Anterior",
                        "sFirst": "Primeiro",
                        "sLast": "Último"
                    },
                    "oAria": {
                        "sSortAscending": ": Ordenar colunas de forma ascendente",
                        "sSortDescending": ": Ordenar colunas de forma descendente"
                    },
                    "select": {
                        "rows": {
                            "_": "Selecionado %d linhas",
                            "0": "Nenhuma linha selecionada",
                            "1": "Selecionado 1 linha"
                        }
                    }
                }
            });
        } );

    </script>