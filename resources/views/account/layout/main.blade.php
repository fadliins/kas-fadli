<!doctype html>
<html lang="en">
  <head>
    <title>Signin Template · Bootstrap v5.1</title>
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="css/styles.css" rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>
  </head>
  <body class="text-center">
    <main class="form-signin py-5">
        @yield('container')
    </main>
    <script>
        feather.replace()
    </script>
  </body>
</html>
