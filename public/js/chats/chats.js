
        // Make the AJAX request
        fetch("{{ route('send-message') }}", {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('#messageForm input[name="_token"]').value,
            },
        })
        .then((response) => response.json())
        .then((data) => {
            // Handle the response data as needed
            console.log(data);
        })
        .catch((error) => {
            console.log('Error:', error);
        });