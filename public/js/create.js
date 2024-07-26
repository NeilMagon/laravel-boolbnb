// Validazione Client Side 
const formCreate = document.getElementById('create-form');
const title = document.getElementById('title');
const address = document.getElementById('address');
const thumb = document.getElementById('thumb');
const image = document.getElementById('image');
/* const price = document.getElementById('price'); */
const description = document.getElementById('description');
const squareMeters = document.getElementById('square_meters');
let isValid = false;

formCreate.addEventListener('submit', e => {
    e.preventDefault();

    validateInputs();
    if(isValid){
        formCreate.submit();
    }
});

const setError = (element, message) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = message;
    inputControl.classList.add('error');
    inputControl.classList.remove('success')
}

const setSuccess = element => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = '';
    inputControl.classList.add('success');
    inputControl.classList.remove('error');
};

const validateInputs = () => {
    isValid = false;
    const titleValue = title.value;
    const addressValue = address.value;
    /* const priceValue = price.value; */
    const descriptionValue = description.value;
    const squareMetersValue = squareMeters.value;
    const thumbFile = thumb.files;
    const imageFiles = image.files;
    

    if(titleValue === '') {
        setError(title, 'Il titolo è richiesto');
    } else {
        setSuccess(title);
    }

    if(addressValue === '') {
        setError(address, 'L\'indirizzo è richiesto');
    } else {
        setSuccess(address);
    }

    if(thumbFile.length < 1 || thumbFile === null){
        setError(thumb, 'L\'immagine di copertina è richiesta');
    } else {
        setSuccess(thumb);
    }

    if(imageFiles.length < 4 || imageFiles === null){
        setError(image, 'Sono richieste 4 immagini');
    } else {
        setSuccess(image);
    }

  /*   if(priceValue === '') {
        setError(price, 'Il prezzo è richiesto');
    } else {
        setSuccess(price);
    }
 */
    if(descriptionValue === '') {
        setError(description, 'La descrizione è richiesta');
    } else {
        setSuccess(description);
    }

    if(squareMetersValue === '') {
        setError(squareMeters, 'I metri quadrati sono richiesti');
    } else {
        setSuccess(squareMeters);
    }

    if (titleValue !== "" && titleValue !== null 
        && addressValue !== "" && addressValue !== null 
        && thumbFile !== "" && thumbFile !== null 
        && imageFiles !== "" && imageFiles !== null
       /*  && priceValue !== "" && priceValue !== null  */
        && descriptionValue !== "" && descriptionValue !== null 
        && squareMetersValue !== "" && squareMetersValue !== null){
            isValid = true;
    }

};