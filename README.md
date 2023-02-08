Bootstrap version = 5

Use case 

```

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>MirakmalSulton - dynamic-input</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container p-3">
    <div class="row">
        <div class="col-lg-6">

            <form action="/" method="post">
                <?php $data[] = ['aaa', 'bbb', 'ccc']; ?>
                <?php $data[] = ['ddd', 'eee', 'fff']; ?>

                <?php echo \MirakmalSulton\DynamicInput\Input::render([
                    'structure' => [
                        'name' => 'example_name',
                        'cols' => ['aaa', 'bbb', 'ccc']
                    ],
                    'data' => $data
                ]) ?>

                <input type="submit">
            </form>

        </div>
    </div>
</div>

</body>
</html>

```