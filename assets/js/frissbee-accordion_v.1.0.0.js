"use strict";(()=>{const t=document.createElement("template");t.innerHTML=`
    <style>
      * { box-sizing: border-box; overflow: hidden; }
      .container-accordion { border: 1px solid #dedede; border-radius: 0px; margin-bottom: 0px }
      .accordion { background-color: #f1f1f1; color: #444; cursor: pointer; padding: 18px; width: 100%; border: none; text-align: left; outline: none; font-size: 16px; font-family: Verdana, Geneva, Tahoma, sans-serif; }
      .accordion:after { content: '\\002B'; color: #777; font-weight: bold; float: right; margin-left: 5px; color: inherit; }
      .active:after { content: "\\2212"; color: inherit; }
      .container-panel { background-color: #fff; max-height: 0; overflow: hidden; transition: max-height 0.4s ease-out; }
      .panel-accordion { padding: 18px; }
    </style>

    <div part="container-accordion" class="container-accordion">
      <button part="btn-title" class="accordion"></button>
      <div part="container-panel" class="container-panel">
        <div part="panel-accordion" class="panel-accordion">
          <slot></slot>
        </div>
      </div>
    </div>
    `;class i extends HTMLElement{#root=null;#containerAccordion=null;#accordion=null;containerPanel=null;#panelAccordion=null;constructor(){super(),this.#root=this.attachShadow({mode:"open"}),this.#root.appendChild(t.content.cloneNode(!0)),this.#containerAccordion=this.#root.querySelector(".container-accordion"),this.#accordion=this.#root.querySelector(".accordion"),this.containerPanel=this.#root.querySelector(".container-panel"),this.#panelAccordion=this.#root.querySelector(".panel-accordion")}static get observedAttributes(){return["acc-title","is-active","color-title","bg-title","bg-text","border-style","border-radius","margin-bottom","title-size","title-font-family","is-title-bold","padding-acc"]}attributeChangedCallback(t,i,e){"acc-title"===t&&(this.#accordion.innerText=e),"is-active"===t&&(this.#accordion.classList.add("active"),this.containerPanel.style.maxHeight=this.containerPanel.scrollHeight+"px"),"color-title"===t&&(this.#accordion.style.color=e),"bg-title"===t&&(this.#accordion.style.backgroundColor=e),"bg-text"===t&&(this.containerPanel.style.backgroundColor=e),"border-style"===t&&(this.#containerAccordion.style.border=e),"border-radius"===t&&(this.#containerAccordion.style.borderRadius=e),"margin-bottom"===t&&(this.#containerAccordion.style.marginBottom=e),"title-size"===t&&(this.#accordion.style.fontSize=e),"title-font-family"===t&&(this.#accordion.style.fontFamily=e),"is-title-bold"===t&&(this.#accordion.style.fontWeight="bold"),"padding-acc"===t&&(this.#accordion.style.padding=e,this.#panelAccordion.style.padding=e)}connectedCallback(){this.#accordion.addEventListener("click",this.#handelAccordion.bind(this)),window.addEventListener("resize",t=>this.#onResizeWindow(),!0)}#handelAccordion(t){!0===this.hasAttribute("is-active")?(this.removeAttribute("is-active"),this.containerPanel.style.maxHeight=null,this.#accordion.classList.remove("active")):(this.setAttribute("is-active",""),this.#accordion.classList.add("active"))}#onResizeWindow(){this.hasAttribute("is-active")&&(this.containerPanel.style.maxHeight=this.containerPanel.scrollHeight+"px")}addIsActive(){this.setAttribute("is-active","")}removeIsActive(){this.removeAttribute("is-active"),this.containerPanel.style.maxHeight=null,this.#accordion.classList.remove("active")}addTitleIsBold(){this.setAttribute("is-title-bold","")}removeTitleIsBold(){this.removeAttribute("is-title-bold"),this.#accordion.style.fontWeight="normal"}setTitle(t){this.setAttribute("acc-title",t)}setText(t){this.innerHTML=t,this.hasAttribute("is-active")&&(this.containerPanel.style.maxHeight=this.containerPanel.scrollHeight+"px")}}customElements.define("frissbee-accordion",i)})();