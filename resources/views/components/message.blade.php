@if(Session::has('success'))
<div id="success-message"
     class="bg-green-200 border border-green-600 p-4 mb-3 rounded-sm shadow-sm">

    {{ Session::get('success') }}

</div>
@endif

@if(Session::has('error'))
<div id="error-message"
     class="bg-red-200 border border-red-600 p-4 mb-3 rounded-sm shadow-sm">

    {{ Session::get('error') }}

</div>
@endif

<script>

setTimeout(() => {

    let success = document.getElementById('success-message');

    if(success){
        success.style.display = 'none';
    }

    let error = document.getElementById('error-message');

    if(error){
        error.style.display = 'none';
    }

}, 3000); 

</script>