<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>e-card builder</title>
  </head>
  <body>

  <div class="container" style="margin-top: 75px;">
    <div class="row">
      <div class="offset-md-3 col-md-6">

        <h1 style="margin-bottom: 50px;">UUK E-card Builder</h1>

        <form action="/pdf" method="POST">
          @csrf()
          <div class="form-group">
            <label for="firstname">First name</label>
            <input value="Jane" type="text" class="form-control" id="firstname" name="firstname">
          </div>

          <div class="form-group">
            <label for="age">Age</label>
            <input value="12" type="text" class="form-control" id="age" name="age">
          </div>

          <div class="form-group">
            <label for="school">School</label>
            <input value="Royston" type="text" class="form-control" id="school" name="school">
          </div>
          
          <div class="form-group">
            <label for="message">Message</label>
            <textarea maxlength="300" class="form-control" id="message" name="message" rows="3">I'm baby jianbing pour-over +1 hexagon, flannel pitchfork cred letterpress slow-carb mixtape cloud bread. Shabby chic leggings yuccie, beard tote bag bitters blog copper mug poke.

I'm baby jianbing pour-over +1 hexagon, flannel pitchfork cred letterpress slow-carb mixtape cloud bread.</textarea>
          </div>
          
          <button type="submit" class="btn btn-primary">Submit</button>

        </form>

      </div>
    </div>
  </div>    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>