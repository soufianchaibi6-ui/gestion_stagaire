<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suivi de votre demande</title>

    <style>
        body{
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card{
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            width: 350px;
            text-align: center;
        }

        .title{
            font-size: 22px;
            margin-bottom: 20px;
        }

        .info{
            background: #f9fafb;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: left;
        }

        .info p{
            margin: 5px 0;
        }

        .status{
            font-weight: bold;
            font-size: 16px;
            padding: 10px;
            border-radius: 6px;
        }

        .pending{
            background: #fff3cd;
            color: #856404;
        }

        .accepted{
            background: #d4edda;
            color: #155724;
        }

        .refused{
            background: #f8d7da;
            color: #721c24;
        }
    </style>
</head>
<body>

<div class="card">

    <div class="title">📄 Suivi de votre demande</div>

    <!-- INFO STAGAIRE -->
    <div class="info">
        <p><strong>👤 Nom :</strong> {{ $stagaire->nom }} {{ $stagaire->prenom }}</p>
        <p><strong>📧 Email :</strong> {{ $stagaire->email }}</p>
        <p><strong>💼 Filière :</strong> {{ $stagaire->filiere }}</p>
    </div>

    <!-- STATUS -->
    @if($stagaire->status == 'en_attente')
        <div class="status pending">⏳ Votre demande est en attente</div>

    @elseif($stagaire->status == 'accepte')
        <div class="status accepted">✅ Votre demande est acceptée</div>

    @elseif($stagaire->status == 'refuse')
        <div class="status refused">❌ Votre demande est refusée</div>
    @endif

</div>

</body>
</html>