<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Informations & Contact</title>
    <style>
        body { font-family: 'Segoe UI', Arial, sans-serif; background: #fffafb; margin: 0; color: #333; }
        .container { width: 80%; margin: 50px auto; }
        h2 { color: #e91e63; text-align: center; }
        
        /* تصميم الأسئلة الشائعة */
        .faq-section { background: white; padding: 20px; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.05); margin-bottom: 30px; }
        .faq-item { border-bottom: 1px solid #eee; padding: 15px 0; }
        .faq-item:last-child { border-bottom: none; }
        .question { font-weight: bold; color: #e91e63; margin-bottom: 5px; display: block; }
        .answer { color: #666; font-size: 0.95rem; }

        /* تصميم التواصل الاجتماعي */
        .contact-grid { display: flex; justify-content: space-around; gap: 20px; text-align: center; }
        .contact-card { background: white; padding: 20px; border-radius: 15px; flex: 1; box-shadow: 0 5px 15px rgba(0,0,0,0.05); }
        .contact-card h4 { margin: 10px 0; color: #e91e63; }
        .btn-back { display: block; text-align: center; margin-top: 30px; text-decoration: none; color: #e91e63; font-weight: bold; }
    </style>
</head>
<body>

<div class="container">
    <h2>✨ Informations qui vous intéressent ✨</h2>

    <div class="faq-section">
        <div class="faq-item">
            <span class="question">❓ Dois-je réserver à l'avance</span>
            <span class="answer">Oui, il est préférable de réserver sur le site web pour s'assurer que le bon moment est disponible pour vous.</span>
        </div>
        <div class="faq-item">
            <span class="question">🕒 Heures de travail </span>
            <span class="answer">Nous somme ouverts du samedi au jeudi , de 9:00 du matin à 7:00 du soir.</span>
        </div>
        <div class="faq-item">
            <span class="question">📍 Où se trouve le salon?</span>
            <span class="answer">Notre salon est situé dans le centre-ville prés du grand centre commercial.</span>
        </div>
    </div>

    <h2> Contactez nous 📱</h2>
    <div class="contact-grid">
        <div class="contact-card">
            <h4>Instagram</h4>
            <p>@Salon_Beaute_2025</p>
        </div>
        <div class="contact-card">
            <h4>WhatsApp</h4>
            <p>+213 00 00 00 00</p>
        </div>
        <div class="contact-card">
            <h4>Email</h4>
            <p>contact@salon.com</p>
        </div>
    </div>

    <a href="index.php" class="btn-back">← Retour à la page d'accueil</a>
</div>

</body>
</html>