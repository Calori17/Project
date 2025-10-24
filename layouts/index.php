<!DOCTYPE html>
<html lang="pt-br">
<?php include 'header.php'; ?>
<body class="bg-light">

    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="w-100" style="max-width: 400px;">
            <h2 class="text-center mb-4">Descubra seu signo</h2>
            
            <form action="show_zodiac_sign.php" method="POST" class="p-4 bg-white shadow rounded">
                <div class="mb-3">
                    <label for="data_nascimento" class="form-label">Data de Nascimento</label>
                    <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" 
                           max="<?= date('Y-m-d'); ?>" required>
                    <!-- max evita que o usuário escolha uma data futura -->
                </div>

                <button type="submit" class="btn btn-primary w-100">Ver meu signo</button>
            </form>
        </div>
    </div>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</body>
</html>