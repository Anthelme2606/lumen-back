
// document.getElementById('hours').addEventListener('input', function (e) {
//     const value = e.target.value;
//     if (value.length === 1 && parseInt(value, 10) > 2) {
//         e.target.value = '0' + value;
//         document.getElementById('minutes').focus();
//     } else if (value.length === 2) {
//         document.getElementById('minutes').focus();
//     }
// });

// document.getElementById('minutes').addEventListener('input', function (e) {
//     const value = e.target.value;
//     if (value.length === 1 && parseInt(value, 10) > 5) {
//         e.target.value = '0' + value;
//     }
// });

// document.getElementById('hours').addEventListener('blur', function (e) {
//     const value = e.target.value;
//     if (value.length === 1) {
//         e.target.value = '0' + value;
//     }
// });

// document.getElementById('minutes').addEventListener('blur', function (e) {
//     const value = e.target.value;
//     if (value.length === 1) {
//         e.target.value = '0' + value;
//     }
// });
const form1=document.getElementById('imageForm-1');
const input_image_1=document.getElementById('input-image-1');
const input_image_2=document.getElementById('input-image-2');
function updateFileName(input) {
    const fileName = input.files[0] ? input.files[0].name : 'logo';
    input.previousElementSibling.setAttribute('data-placeholder', fileName);
}
// removebg(form1,input_image_1);
// removebg(form1,input_image_2);
//removebg(form2);
// function removebg(element,inpu){
// element.addEventListener('submit', async function(event) {
//     event.preventDefault();

//     const form = event.target;
//     const file = inpu.files[0];

//     if (!file) {
//         alert("Please select an image first.");
//         return;
//     }

//     const apiKey = 'SJS32gKJyRi4SpFC8Nuw4SX5';
//     const formData = new FormData();
//     formData.append('image_file', file);
//     formData.append('size', 'auto');

//     try {
//         const response = await fetch('https://api.remove.bg/v1.0/removebg', {
//             method: 'POST',
//             headers: {
//                 'X-Api-Key': apiKey
//             },
//             body: formData
//         });

//         if (!response.ok) {
//             throw new Error("Failed to remove background");
//         }

//         const blob = await response.blob();
//         const newFile = new File([blob], file.name, { type: blob.type });

//         const newFormData = new FormData(form);
//         newFormData.set('image', newFile);

//         // Send the modified form data to the server
//         const serverResponse = await fetch(form.action, {
//             method: 'POST',
//             body: newFormData,
//             headers: {
//                 'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
//             }
//         });

//         if (!serverResponse.ok) {
//             throw new Error("Failed to upload image");
//         }

       
//         window.location.reload(); // Reload to see the uploaded image
//     } catch (error) {
//         console.error(error);
       
//     }
// });
// }
// const submitButton = document.getElementById('submitButton1');
// const spinner = document.getElementById('spinner');

// const form = document.querySelector('form');
// spin(form,submitButton,spinner);
// function spin(element,sub,spinn)   
// {
   
//     element.addEventListener('submit', function() {
//         sub.disabled = true; 
//         spinn.style.display = 'inline-block'; 
//     });}
//     function handleFormSubmission(formId, spinnerId) {
//         const form = document.getElementById(formId);
//         const spinner = document.getElementById(spinnerId);
    
//         if (!form || !spinner) {
//             console.error('Form or spinner element not found.');
//             return;
//         }
    
//         form.addEventListener('submit', function (event) {
//             event.preventDefault(); // Empêche l'envoi par défaut du formulaire
            
//             // Réinitialise la visibilité du spinner
//             spinner.style.display = 'none';
    
//             // Récupère tous les champs du formulaire
//             const inputs = form.querySelectorAll('input');
//             let allFilled = true;
    
//             // Vérifie chaque champ pour s'assurer qu'il n'est pas vide
//             inputs.forEach(input => {
//                 if (input.value.trim() === '') {
//                     allFilled = false;
//                     input.classList.add('error'); // Ajoute une classe d'erreur pour le style
//                 } else {
//                     input.classList.remove('error'); // Retire la classe d'erreur
//                 }
//             });
    
//             // Si tous les champs sont remplis, simule la soumission et montre le spinner
//             if (allFilled) {
//                 spinner.style.display = 'inline-block'; // Affiche le spinner
//                 // Ici vous pouvez ajouter la logique de soumission réelle du formulaire
//                 setTimeout(() => {
//                     form.submit(); // Soumet le formulaire
//                 }, 1000); // Simulation d'un délai pour montrer le spinner
//             } else {
//                 // Gère le cas où certains champs sont vides
//                 console.log('Veuillez remplir tous les champs.');
//             }
//         });
//     }
    
//     // Exemple d'utilisation de la fonction
//     document.addEventListener('DOMContentLoaded', () => {
//         handleFormSubmission('imageForm-1', 'spinner-1');
//     });
   /* function uploadImage(event) {
        const file = event.target.files[0];
        if (file) {
            const formData = new FormData();
            formData.append('image', file);

            fetch('{{ route('upload.file') }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('image-preview').src = '{{ asset('assets/images/uploads') }}/' + data.filename;
                } else {
                    console.error('Erreur lors du téléchargement de l\'image.');
                }
            })
            .catch(error => console.error('Erreur:', error));
        }
    }*/