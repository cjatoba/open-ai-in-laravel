<div>
    <form id="writebotForm" method="post" action="{{ route('writebot') }}">
        @csrf
        <label for="prompt">Prompt:</label>
        <textarea name="prompt" id="prompt" cols="50" rows="4" autofocus></textarea>
        <button type="submit">Submit</button>
    </form>
    <section id="response"></section>
</div>

<script>
    const writebotForm = document.getElementById('writebotForm');

    writebotForm.onsubmit = (event) => {
        event.preventDefault();
        const formData = new FormData(writebotForm);

       axios.post(event.target.action, formData)
           .then(response => {
               const sectionResponse = document.getElementById('response');

               sectionResponse.innerHTML = response.data.response;
           });
    };
</script>
