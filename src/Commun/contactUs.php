<?php include '../Include/head.php'; ?>


	  <title>CONTACT US</title>
  </head>
  <body>
<?php 	include ("../Include/nav.php");?>    


<!-- Wrapper container -->
<div class="container py-4">

  <!-- Bootstrap 5 starter form -->
  <form id="contactForm" data-sb-form-api-token="API_TOKEN">

    <!-- Name input -->
    <div class="mb-3">
      <label class="form-label" for="name">Nom</label>
      <input class="form-control" id="name" type="text" placeholder="Name" data-sb-validations="required" />
      <div class="invalid-feedback" data-sb-feedback="name:required">Le nom est requis.</div>
    </div>

    <!-- Email address input -->
    <div class="mb-3">
      <label class="form-label" for="emailAddress">Adresse e-mail</label>
      <input class="form-control" id="emailAddress" type="email" placeholder="Email Address" data-sb-validations="required, email" />
      <div class="invalid-feedback" data-sb-feedback="emailAddress:required">Adresse e-mail est nécessaire.</div>
      <div class="invalid-feedback" data-sb-feedback="emailAddress:email">Adresse e-mail L'e-mail n'est pas valide.</div>
    </div>

    <!-- Message input -->
    <div class="mb-3">
      <label class="form-label" for="message">Message</label>
      <textarea class="form-control" id="message" type="text" placeholder="Message" style="height: 10rem;" data-sb-validations="required"></textarea>
      <div class="invalid-feedback" data-sb-feedback="message:required">Un message est requis.</div>
    </div>

    <!-- Form submissions success message -->
    <div class="d-none" id="submitSuccessMessage">
      <div class="text-center mb-3">Envoi du formulaire réussi!</div>
    </div>

    <!-- Form submissions error message -->
    <div class="d-none" id="submitErrorMessage">
      <div class="text-center text-danger mb-3">Erreur lors de l'envoi du message!</div>
    </div>

    <!-- Form submit button -->
    <div class="d-grid">
      <button class="btn btn-primary btn-lg disabled" id="submitButton" type="submit">Soumettre</button>
    </div>

  </form>

</div>


<!-- SB Forms JS -->
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

<?php include '../Include/foot.php'; ?>
