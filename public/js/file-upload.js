


let FileInputs = document.querySelectorAll('.marketopia-zone .file-input');
FileInputs.forEach((input) => {
    input.addEventListener('change', function(event) {
        const file = event.target.files[0];
        const dzMessage1 = input.parentElement.querySelector('.dz-message');
    
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const dzMessage = input.parentElement.querySelector('.dz-images');
                dzMessage.innerHTML = ''; // Clear the dz-message content
    
                dzMessage1.classList.add('d-none');
                const card = document.createElement('div');
                card.classList.add('card');
    
                const cardBody = document.createElement('div');
                cardBody.classList.add('card-body');
    
                const cardFooter = document.createElement('div');
                cardFooter.classList.add('card-footer');
    
                const imgPreview = document.createElement('img');
                imgPreview.src = e.target.result;
    
                const removeBtn = document.createElement('button');
                removeBtn.classList.add('remove-btn');
                removeBtn.classList.add('btn');
                removeBtn.classList.add('btn-danger');
                removeBtn.innerText = 'Remove';
                removeBtn.type = 'button';
                removeBtn.addEventListener('click', function() {
                    input.value = ''; // Clear the file input
                    dzMessage1.classList.remove('d-none');
                    dzMessage.innerHTML = '';
                });
    
                cardBody.appendChild(imgPreview);
                cardFooter.appendChild(removeBtn);
    
                card.appendChild(cardBody);
                card.appendChild(cardFooter);
    
    
                dzMessage.appendChild(card);
            };
            reader.readAsDataURL(file);
        }
    
    });
});
