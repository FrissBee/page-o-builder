'use strict';

(() => {
  // =========================
  // 	DOM
  const pageBuilder = document.querySelector('page-o-builder');
  const btnSaveData = document.querySelector('.btn-save-data');

  const nameTemplate = document.querySelector('[name="name-template"]');
  const chooseTemplate = document.querySelector('[name="choose-template"]');

  // =========================
  // 	LETs & CONSTs
  const baseUrl = 'http://localhost/___FrissBee/___FrissBee%20-%20Subs/page-o-builder/';
  // const baseUrl = 'https://page-o-builder.frissbee.de/demo';
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
      getEditorContent(idContents);

      btnSaveData?.addEventListener('click', (e) => {
        const data = pageBuilder.getContent();
        saveData(JSON.stringify(data.contentEditor), data.contentPage, idContents);
      });
    } else {
      btnSaveData?.addEventListener('click', (e) => {
        const data = pageBuilder.getContent();
        insertData(JSON.stringify(data.contentEditor), data.contentPage, nameTemplate.value);
      });
    }

    chooseTemplate?.addEventListener('change', (e) => {
      window.location.href = e.currentTarget.value === '0' ? baseUrl : baseUrl + searchPara + e.currentTarget.value;
    });
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
        if (res === false) {
          window.location.href = baseUrl;
        } else {
          pageBuilder.setContentEditor(res.contentEditor);
          nameTemplate.value = res.name;
        }
      })
      .catch((error) => alert(`getEditorContent: \n` + error));
  };

  const insertData = async (dataContentEditor, dataContentPage, name) => {
    const params = {
      action: 'insert-data-from-page-builder',
      contentEditor: dataContentEditor,
      contentPage: dataContentPage,
      name: name,
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
      name: nameTemplate.value,
    };

    await fetch('./inc/api.php', {
      method: 'POST',
      body: JSON.stringify(params),
    })
      .then((response) => response.json())
      .then((res) => {
        window.location.reload();
      })
      .catch((error) => alert(`saveData: \n` + error));
  };

  init();
})();
