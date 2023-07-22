<!DOCTYPE html>
<html>

<head>
    <title>Form Example</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <!-- Propeller Outline Input Field -->
        <div class="form-group pmd-textfield pmd-textfield-outline pmd-textfield-floating-label">
            <label for="outlinefield">
                Outline Input With Floating Label
            </label>
            <input id="outlinefield" class="form-control" type="text">
        </div>

        <!--Help Text with Outline Input -->
        <div class="form-group pmd-textfield pmd-textfield-outline pmd-textfield-floating-label">
            <label for="outline-floating-label-help1">Outline Input with help text</label>
            <input type="text" id="outline-floating-label-help1" class="form-control">
            <small id="inputhelptext" class="form-text text-muted">Help Text.</small>
        </div>

        <!-- Outline Textarea -->
        <div class="form-group pmd-textfield pmd-textfield-outline pmd-textfield-floating-label">
            <label>Outline Floating Label Textarea</label>
            <textarea required class="form-control"></textarea>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>