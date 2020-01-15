// export async function toggleGallery(editor) {
//     toggleModal();
//     const content = document.getElementById('content'); // textarea
//     if (!content) return;
//
//     const modal_content = document.querySelector('.modal-body');
//     if (!document.body.classList.contains('modal-active') || modal_content.innerHTML !== '') return;
//     try {
//         const result = await fetch('/api/image', {});
//         const data = await result.json();
//
//         if (data.success) {
//             Object.values(data.data).forEach(image => {
//                 const imageContainer = document.createElement('a');
//                 imageContainer.className = 'relative w-1/3';
//                 imageContainer.innerHTML = `
//                     <img class="" src="${image.url}" alt="${image.name}" style="">
//                 `;
//                 imageContainer.addEventListener('click', function (event) {
//                     toggleModal();
//
//                     const newText = `![${image.name}](${image.url})`;
//                     const doc = editor.codemirror.getDoc();
//                     if (doc) {
//                         const cursor = doc.getCursor();
//                         doc.replaceRange(newText, cursor);
//                     }
//                 }.bind(image, editor));
//
//                 modal_content.appendChild(imageContainer);
//             })
//         }
//     } catch (e) {
//         console.error('fetching images', e);
//     }
// }
