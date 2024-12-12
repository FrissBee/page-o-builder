'use strict';

(() => {
  // =========================
  // 	DOM
  const pageBuilder = document.querySelector('page-o-builder');
  const btnSaveData = document.querySelector('.btn-save-data');

  // =========================
  // 	LETs & CONSTs

  // ************************************
  const baseUrl = '[ ENTER HERE YOUR BASE URL - FOR EXAMPLE: `http://localhost:3000/paht-to-yout-project` ]';
  const searchPara = '?id=';
  let idContents = 0;

  // =========================
  // 	INIT
  const init = () => {
    const url = new URL(window.location.href);
    const searchParams = new URLSearchParams(url.search);

    if (searchParams.has('id')) {
      idContents = Number(searchParams.get('id'));
    }

    if (idContents !== 0) {
      // ************************************
      // remove attribute "no-data" with JavaScript (in this project it is done with PHP, see: index.php)
      // pageBuilder.removeAttribute('no-data');

      // ************************************
      // get the content for the page builder
      getEditorContent(idContents);

      btnSaveData.addEventListener('click', (e) => {
        const data = pageBuilder.getContent();
        saveData(JSON.stringify(data.contentEditor), data.contentPage, idContents);
      });
    } else {
      btnSaveData.addEventListener('click', (e) => {
        const data = pageBuilder.getContent();
        insertData(JSON.stringify(data.contentEditor), data.contentPage);
      });
    }
  };

  // =========================
  // 	FETCH DATA
  const getEditorContent = async (id) => {
    const params = {
      action: 'get-content-editor',
      id: id,
    };

    await fetch('./inc/api.php', {
      method: 'POST',
      body: JSON.stringify(params),
    })
      .then((response) => response.json())
      .then((res) => {
        // ************************************
        // Set the editor data:
        pageBuilder.setContentEditor(res.contentEditor);
      })
      .catch((error) => alert(`getEditorContent: \n` + error));
  };

  const insertData = async (dataContentEditor, dataContentPage) => {
    const params = {
      action: 'insert-data-from-page-builder',
      contentEditor: dataContentEditor,
      contentPage: dataContentPage,
    };

    await fetch('./inc/api.php', {
      method: 'POST',
      body: JSON.stringify(params),
    })
      .then((response) => response.json())
      .then((res) => {
        window.location.href = baseUrl + searchPara + res;
      })
      .catch((error) => alert(`insertData: \n` + error));
  };

  const saveData = async (dataContentEditor, dataContentPage, id) => {
    const params = {
      action: 'save-data-from-page-builder',
      contentEditor: dataContentEditor,
      contentPage: dataContentPage,
      id: id,
    };

    await fetch('./inc/api.php', {
      method: 'POST',
      body: JSON.stringify(params),
    })
      .then((response) => response.json())
      .then((res) => {
        // ************************************
        // reloading the page. optional
        window.location.reload();
      })
      .catch((error) => alert(`saveData: \n` + error));
  };

  init();
})();
