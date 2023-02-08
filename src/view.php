<?php
/**
 * @var int $start
 * @var array $data
 * @var array $structure
 * @var string $name
 */
?>

<div id="dynamic_container" data-start="<?= $start ?>" data-structure='<?= json_encode($structure) ?>'>

    <button id="dynamic_add_btn" class="btn btn-success btn-sm mb-3">+ add</button>

    <?php $rowCounter = 0; ?>
    <?php foreach ($data as $item) : ?>
        <div class="input-group mb-1">
            <?php $colCounter = 0; ?>
            <?php foreach ($item as $col) : ?>
                <input
                    class="form-control"
                    name="<?= $name ?>[<?= $rowCounter ?>][<?= $col ?>]"
                    placeholder="<?= ucfirst($item[$colCounter]) ?>"
                    value="<?= $item[$colCounter] ?>">
                <?php $colCounter++ ?>
            <?php endforeach ?>
            <span class="input-group-text dynamic_del_btn" role="button">-</span>
        </div>
        <?php $rowCounter++ ?>
    <?php endforeach ?>

</div>

<script>
    $(document).ready(function () {
        let container = $('#dynamic_container');
        let counter = container.data('start');

        let structure = container.data('structure');
        let name = structure.name
        let cols = structure.cols

        let add_button = $("#dynamic_add_btn");

        $(add_button).click(function () {
            let div = createInputs(counter, name, cols);
            container.append(div);
            counter++;
        });

        $(container).on("click", ".dynamic_del_btn", function () {
            $(this).parent('div').remove();
        })

        function createInputs(counter, name, cols) {
            let span = $('<span>').addClass('input-group-text dynamic_del_btn').attr('role', 'button').text('-');
            let div = $('<div>');

            for (let i = 0; i < cols.length; i++) {
                let col = $('<input>')
                    .addClass('form-control')
                    .attr('name', name + '[' + counter + '][' + cols[i] + ']')
                    .attr('placeholder', ucFirst(cols[i]));
                div.append(col)
            }

            return div.addClass('input-group mb-1').append(span);
        }

        function ucFirst(string) {
            return string.charAt(0).toUpperCase() + string.slice(1);
        }
    });
</script>