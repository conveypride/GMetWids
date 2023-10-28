
// alert('hi')
document.getElementById('download').addEventListener('click', function() {
  document.getElementById('downloadS').innerHTML = '<div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div>';
var vv =  document.getElementById('downloadS');
 
//   alert('clicked')
// Select the element you want to capture as a screenshot
const elementToCapture = document.querySelector('#page');
var htmlElement = document.querySelector('.pagepape');
// var doc = new jsPDF();
// Use html2canvas to capture a screenshot of the element
// var ctx = elementToCapture.getContext('2d');
// var png = elementToCapture.getCanvas().toDataURL();
// var copy = new Image();
// img.onload = function() {
//   ctx.drawImage(img, 3, snapshot.height - logo.height - 4, logo.width, logo.height);
// };

html2canvas(elementToCapture, {
  scale: 2, // Set the scale for higher DPI
  logging: true, // Enable logging for debugging
  quality: 2,
  allowTaint: true,
  useCORS: true,
  imageTimeout: 0,
}).then(function(canvas) {
//   alert('captured')
  // Create a PDF document
  const pdf = new jsPDF('p', 'mm', 'a4');
    
  // Calculate the width and height of the PDF page to match the screenshot
  const pdfWidth = 210; // A4 width in mm
  const pdfHeight = 297; // A4 height in mm

  // Add the screenshot as an image to the PDF

  pdf.addImage(canvas.toDataURL('image/jpeg', 1.0), 'JPEG', 0, 0, pdfWidth, pdfHeight);

  // Download the PDF with a specified filename
  // document.body.appendChild(canvas);
  const today = new Date();
const formattedDate = formatDate(today);
  pdf.save( `${formattedDate}.pdf`);
  downloadImg ();
  
  vv.innerHTML = '<button class="btn text-white float-end m-2 p-2" id="download" style="background-color:green">Download Successful</button>';
//   alert('done')
});
 
});
 

function formatDate(date) {
  const day = String(date.getDate()).padStart(2, '0');
  const month = String(date.getMonth() + 1).padStart(2, '0');
  const year = String(date.getFullYear()).slice(-2);
  
  return `${day}-${month}-${year}`;
}





 function downloadImg () {
  // const pdfWidth = 210; // A4 width in mm
  //   const pdfHeight = 297; // A4 height in mm
  // var node = document.getElementById('page');
  // var options = {
  //     quality: 2
  // };

  // domtoimage.toJpeg(node, options).then(function (dataUrl)
  // {
  //     var doc = new jsPDF();
  //     doc.addImage(dataUrl, 'JPEG', 0, 0, pdfWidth, pdfHeight);
  //     doc.save('Test.pdf');
  // });
  const today = new Date();
  const formattedDate = formatDate(today);

  html2canvas(document.getElementById("page")).then(function (canvas) {
      var anchorTag = document.createElement("a");
      // document.body.appendChild(anchorTag);
      // document.body.appendChild(canvas);
      anchorTag.download = `${formattedDate}.jpg`;
      anchorTag.href = canvas.toDataURL();
      anchorTag.target = '_blank';
      anchorTag.click();
  });
};

