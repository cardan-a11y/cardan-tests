<html><head><title>Tests and bookmarklet for 2.5.8</title></head><body>
	<h1>Tests for 2.5.8</h1>
	<h2>Tests</h2>
<div class="inlinebutton">
  <div><button>1</button></div>
  <div><button>2</button></div>
  <div><button>3</button></div>
  <div><button>4</button></div>
</div>
<fieldset>
  <legend>Test with modified checkboxes</legend>

  <input type="checkbox" name="a" value="1">
  <input type="checkbox" name="a" value="2">
  <input type="checkbox" name="a" value="2">

</fieldset>
<nav>
  <ul>
    <li><a href="#" class="active">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">4</a></li>
    <li><a href="#">5</a></li>
    <li><a href="#">6</a></li>
  </ul>
</nav>

<nav class="nav2">
  <ul>
    <li><a href="#" class="active">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">4</a></li>
    <li><a href="#">5</a></li>
    <li><a href="#">6</a></li>
  </ul>
</nav>

<nav class="nav3">
  <ul>
    <li><a href="#" class="active">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">4</a></li>
    <li><a href="#">5</a></li>
    <li><a href="#">6</a></li>
  </ul>
</nav>

<h2>Browser bookmarklet</h2>
<p>Get the <a href="javascript:(function(){function t(e){const t=e.getBoundingClientRect();return{top:t.top+window.scrollY+t.height/2,left:t.left+window.scrollX+t.width/2}}function e(e){let t=e;while(t){const e=getComputedStyle(t);if('none'===e.display||'hidden'===e.visibility)return!1;t=t.parentElement}return!0}const n='http://www.w3.org/2000/svg',o=[...document.querySelectorAll('a, label, button, input:not([type=hidden]), select, textarea, [tabindex], [role=button], [onclick], [role=checkbox], [role=link], [role=menuitem], [role=option], [role=radio], [role=switch], [role=tab]')].filter(e),s=[];o.forEach(function(e){if(!e.matches('label')&&e.closest('label'))return;const o=t(e);s.push({element:e,center:o});const r=document.createElementNS(n,'svg');r.style.position='absolute',r.style.top=`${o.top-12}px`,r.style.left=`${o.left-12}px`,r.style.width='24px',r.style.height='24px',r.style.zIndex='9999',r.style.margin='0',r.style.pointerEvents='none',r.setAttribute('aria-hidden','true');const l=document.createElementNS(n,'circle');l.setAttribute('cx','12'),l.setAttribute('cy','12'),l.setAttribute('r','12');const a=document.createElementNS(n,'clipPath');a.setAttribute('id','clip'),a.appendChild(l.cloneNode()),r.appendChild(a),l.setAttribute('clip-path','url(#clip)');e.getBoundingClientRect().width<24||e.getBoundingClientRect().height<24?l.setAttribute('fill','rgba(0, 0, 255, 0.3)'):(l.setAttribute('fill','rgba(0, 200, 0, 0.3)'),l.setAttribute('stroke','rgba(0, 200, 0, 0.8)'),l.setAttribute('stroke-width','4')),r.appendChild(l),document.body.appendChild(r)});const r=[];s.forEach(function(e,t){s.slice(t+1).forEach(function(n){const distance = Math.sqrt(Math.pow(n.center.left-e.center.left,2)+Math.pow(n.center.top-e.center.top,2)); if (distance < 24) { r.push(e.element); r.push(n.element); e.element.setAttribute('aria-description','overlap'); n.element.setAttribute('aria-description','overlap'); } })});const l=[...new Set(r)];l.forEach(function(e){const r = document.createElementNS(n,'svg'); r.style.position='absolute'; r.style.top = `${t(e).top-12}px`; r.style.left = `${t(e).left-12}px`; r.style.width = '24px'; r.style.height = '24px'; r.style.zIndex = '9999'; r.style.margin = '0'; r.style.pointerEvents = 'none'; r.setAttribute('aria-hidden', 'true'); const circle = document.createElementNS(n,'circle'); circle.setAttribute('cx', '12'); circle.setAttribute('cy', '12'); circle.setAttribute('r', '12'); circle.setAttribute('fill', 'rgba(255, 0, 0, 0.3)'); r.appendChild(circle); document.body.appendChild(r); }); alert(`There are ${l.length} overlapping controls.`)})();">2.5.8 Target size</a> Bookmarklet (drag link to your browser bar)</p>
<p>An attempt to make the process of checking 2.5.8 Target Size (Minimum) as painless and swift as is possible.</p>
<h3>Description</h3>
<ul>
  <li><span style="color:rgba(255, 0, 0, 1);font-weight:700;">Red circles</span>: check if this small interactive component overlaps another component. High risk for SC 2.5.8</li>
  <li><span style="color:rgba(0, 0, 255, 1);font-weight:700;">Blue circles:</span> Highlights small objects (smaller than 24px) which are a possible risk for SC 2.5.8</li>
  <li><span style="color:rgba(0, 200, 0, 1);font-weight:700;">Green circles:</span> Highlights objects which are large enough. Very low risk for SC 2.5.8, but always check!</li>
</ul>

<p>Script highlights following interactive components: <code>a</code>, <code>label</code>, <code>button</code>, <code>input:not([type=hidden])</code>, <code>select</code>, <code>textarea</code>, <code>[tabindex]</code>, <code>[onclick]</code>, <code>[role=button]</code>, <code>[role=checkbox]</code>, <code>[role=link]</code>, <code>[role=menuitem]</code>, <code>[role=option]</code>, <code>[role=radio]</code>, <code>[role=switch]</code>, <code>[role=tab]</code></p>
<p>Script will <strong>NOT CHECK</strong> for objects which are made interactive with JavaScript and do not contain any of above. These objects are also a faillure under 4.1.2 and most likely under other SC.</p>
<style>
	nav,
fieldset {
  margin-bottom: 3em;
}

input[type="checkbox"] {
  margin: 0;
  padding: 0;
  border: 2px solid #000;
  width: 16px;
  height: 16px;
}

.inlinebutton {
  margin-bottom: 4em;
}
.inlinebutton div {
  display: inline-block;
  margin: 0;
  padding: 0;
}
button {
  width: 14px;
  height: 14px;
  margin: 0;
  padding: 0;
  border: 1px solid #000;
  background: #eee;
}

nav ul li {
  display: inline-block;
}
nav ul li a {
  display: inline-block;
  margin: 1px;
  font-size: 10px;
  border: 1px solid #111;
  padding: 2px;
  background: #eee;
  color: #111;
  text-decoration: none;
}

nav ul li a.active {
  background: #111;
  color: #fff;
  text-decoration: none;
}

nav.nav2 ul li a {
  font-size: 13px;
  padding: 5px;
  margin-right: 5px;
}

nav.nav3 ul li a {
  font-size: 13px;
  margin-right: 5px;
  width: 24px;
  height: 24px;
  text-align: center;
  display: block;
}



code {background:#eee;font-weight:700;display:inline-block;padding:2px 4px;border-radius:2px;}

* {font-family:arial,helvetica,sans-serif;font-size:16px;font-size:1rem;}
h1 {font-size:1.5em;}
h2 {font-size:1.2em;}
h3 {font-size:1.1em;}

</style>

</body></html>