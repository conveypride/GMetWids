// import { jsPDF } from "jspdf";


// function generatePdf() {
//     let jsPdf = new jsPDF('p', 'mm', 'a4');
//     var htmlElement = document.querySelector('.pagepape');

//     // you need to load html2canvas (and dompurify if you pass a string to html)
//     const opt = {
//         callback: function (jsPdf) {
//             jsPdf.save("Test.pdf");
//             // to open the generated PDF in browser window
//             // window.open(jsPdf.output('bloburl'));
//         },
//         margin: [0, 0, 0, 0],
        
//         html2canvas: {
//             // allowTaint: true,
//             // dpi: 300,
//             // letterRendering: true,
//             logging: false,
//             windowWidth:21,
//         }
//     };

//     jsPdf.html(htmlElement, opt);

   
// }
function formatDate(date) {
  const day = String(date.getDate()).padStart(2, '0');
  const month = String(date.getMonth() + 1).padStart(2, '0');
  const year = String(date.getFullYear()).slice(-2);
  
  return `${day}-${month}-${year}`;
}

// alert('hi')
document.getElementById('download').addEventListener('click', function() {
  document.getElementById('downloadS').innerHTML = '<div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div>';
var vv =  document.getElementById('downloadS');
 
//   alert('clicked')
// Select the element you want to capture as a screenshot
const elementToCapture = document.querySelector('#page');
// var doc = new jsPDF();
// Use html2canvas to capture a screenshot of the element
html2canvas(elementToCapture, {
  scale: 2, // Set the scale for higher DPI
  logging: true, // Enable logging for debugging
  quality: 2
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
// function exportPdf(){
//   var pdf = new jsPDF();
//   pdf.text(20,20,"Employee Details");
//   pdf.autoTable({html:'#page',
//       startY: 25,
//       theme:'grid',
//       columnStyles:{
//           0:{cellWidth:20},
//           1:{cellWidth:60},
//           2:{cellWidth:40},
//           3:{cellWidth:60}
//       },
//       bodyStyles: {lineColor: [1, 1, 1]},
//       styles:{minCellHeight:10}
//   });
//   window.open(URL.createObjectURL(pdf.output("blob")))
// }

// document.getElementById("download").addEventListener('click', function () {
//   const pdfWidth = 210; // A4 width in mm
//     const pdfHeight = 297; // A4 height in mm
//   var node = document.getElementById('page');
//   var options = {
//       quality: 2
//   };

//   domtoimage.toJpeg(node, options).then(function (dataUrl)
//   {
//       var doc = new jsPDF();
//       doc.addImage(dataUrl, 'JPEG', 0, 0, pdfWidth, pdfHeight);
//       doc.save('Test.pdf');
//   });

  // html2canvas(document.getElementById("page")).then(function (canvas) {
  //     var anchorTag = document.createElement("a");
  //     document.body.appendChild(anchorTag);
  //     document.body.appendChild(canvas);
  //     anchorTag.download = "filename.jpg";
  //     anchorTag.href = canvas.toDataURL();
  //     anchorTag.target = '_blank';
  //     anchorTag.click();
  // });
// });

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