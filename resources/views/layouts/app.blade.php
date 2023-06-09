<!DOCTYPE html>
<html>
<head>
    <title>Laravel</title>
    @livewireStyles
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">


</head>
<body>
<div class="container">

    <div class="card">
      <div class="card-header">
              Product Details
      </div>
      <div class="card-body">

        @if( isset($slot) ) {{ $slot }} @endif

      </div>
    </div>

</div>

</body>

@livewireScripts

</html>
