'use strict';
(() => {
  const e = document.querySelectorAll('.pob-container-screen-resize-wgstzux');
  var t = document.querySelectorAll('frissbee-audio-player');
  const r = document.querySelector('body'),
    o = [],
    s =
      (e.forEach((e) => {
        o.push(e.style.width);
      }),
      t?.forEach((e) => {
        e.playlist = JSON.parse(e.getAttribute('play-list'));
      }),
      () => {
        e.forEach((e, t) => {
          r.offsetWidth < 1014 ? (e.style.width = '100%') : (e.style.width = o[t]);
        });
      });
  window.addEventListener('resize', (e) => {
    s();
  }),
    window.addEventListener('DOMContentLoaded', (e) => {
      s();
    });
})(),
  (() => {
    const t = document.querySelectorAll('.pob-container-screen-resize-wgstzux');
    document.querySelectorAll('frissbee-audio-player')?.forEach((e) => {
      e.playlist = JSON.parse(e.getAttribute('play-list'));
    }),
      window.addEventListener('resize', (e) => {
        t.forEach((e) => {
          e.offsetWidth < 1014 && (e.style.width = '100%');
        });
      }),
      window.addEventListener('DOMContentLoaded', (e) => {
        t.forEach((e) => {
          e.offsetWidth < 1014 && (e.style.width = '100%');
        });
      });
  })();
