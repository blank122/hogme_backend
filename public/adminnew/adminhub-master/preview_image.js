const selectImageFacility = document.querySelector('.select-image-facility');
const inputFileFacility = document.querySelector('#file-facility');
const imgAreaFacility = document.querySelector('.img-area-facility');

selectImageFacility.addEventListener('click', function () {
	inputFileFacility.click();
})

inputFileFacility.addEventListener('change', function () {
	const image = this.files[0]
	if(image.size < 2000000) {
		const reader = new FileReader();
		reader.onload = ()=> {
			const allImg = imgAreaFacility.querySelectorAll('img');
			allImg.forEach(item=> item.remove());
			const imgUrl = reader.result;
			const img = document.createElement('img');
			img.src = imgUrl;
			imgAreaFacility.appendChild(img);
			imgAreaFacility.classList.add('active');
			imgAreaFacility.dataset.img = image.name;
		}
		reader.readAsDataURL(image);
	} else {
		alert("Image size more than 2MB");
	}
})

const selectImageValidID = document.querySelector('.select-image-valid-id');
const inputFileValidID = document.querySelector('#file-valid-id');
const imgAreaValidID = document.querySelector('.img-area-valid-id');

selectImageValidID.addEventListener('click', function () {
	inputFileValidID.click();
})

inputFileValidID.addEventListener('change', function () {
	const image = this.files[0]
	if(image.size < 2000000) {
		const reader = new FileReader();
		reader.onload = ()=> {
			const allImg = imgAreaValidID.querySelectorAll('img');
			allImg.forEach(item=> item.remove());
			const imgUrl = reader.result;
			const img = document.createElement('img');
			img.src = imgUrl;
			imgAreaValidID.appendChild(img);
			imgAreaValidID.classList.add('active');
			imgAreaValidID.dataset.img = image.name;
		}
		reader.readAsDataURL(image);
	} else {
		alert("Image size more than 2MB");
	}
})

const selectImage = document.querySelector('.select-image');
const inputFile = document.querySelector('#file');
const imgArea = document.querySelector('.img-area');

selectImage.addEventListener('click', function () {
	inputFile.click();
})

inputFile.addEventListener('change', function () {
	const image = this.files[0]
	if(image.size < 2000000) {
		const reader = new FileReader();
		reader.onload = ()=> {
			const allImg = imgArea.querySelectorAll('img');
			allImg.forEach(item=> item.remove());
			const imgUrl = reader.result;
			const img = document.createElement('img');
			img.src = imgUrl;
			imgArea.appendChild(img);
			imgArea.classList.add('active');
			imgArea.dataset.img = image.name;
		}
		reader.readAsDataURL(image);
	} else {
		alert("Image size more than 2MB");
	}
})