import Chord from './Chord';
import '../../css/app.css';
import React, { useState } from 'react';
import ReactDOM, { render } from 'react-dom';
import axios from 'axios';
import Radium, { StyleRoot } from 'radium';

function App(props) {
    const [hide, setHide] = useState('');
    const url = '/category';

    const categories = props.categories;
    const tags = props.tags;
    const articles = props.posts;

    const colors = categories.map((category) => (
        category.style
    ));

    const categoriesAndTags = [...categories, ...tags];

    const keys = categoriesAndTags.map(item => item.name);

    const style = {
      '@media (max-width: 600px)': {
        height: '400px',
      },
      '@media (min-width: 992px)': {
        height: '830px',
      },
    };

    function generateMatrix(categories, tags, articles) {
        const mapToIndex = new Map();
        const categoriesAndTags = [...categories, ...tags];
        categoriesAndTags.forEach((value, index) => {
          mapToIndex.set(value.name, index);
        });

        let matrice = Array(categoriesAndTags.length).fill(0).map(() => Array(categoriesAndTags.length).fill(0));

        articles.forEach(articolo => {
          let riga = mapToIndex.get(articolo.categoria);
          articolo.tags.forEach(tag => {
            let colonna = mapToIndex.get(tag);
            if (riga !== undefined && colonna !== undefined) {
              matrice[riga][colonna]++;
            }
          });
        });

        return matrice;
    }

    const matrix = generateMatrix(categories, tags, articles);

    function hideOnClick(id) {
      setHide({value: id});
      const body = {
          'chordId' : id,
      };

      axios.post(url, body)
      .then(function(response){
            var newNode = document.createElement('div');
            newNode.id = 'chord_id';
            newNode.innerHTML = response.data;
            var currentNode = document.querySelector('#chord_id');
            currentNode.replaceWith(newNode);
        })
        .catch(error => {
            console.log("ERROR:: ",error.response);
        });
    }

    return (
      <StyleRoot>
        <div className="App">
            <div style={style}>
                <Chord hideOnClick={hideOnClick} keys={keys} colors={colors} matrix={matrix}/>
            </div>
        </div>
      </StyleRoot>
    );
}

export default App;

if (document.getElementById('app')) {
    const chord = document.getElementById('app');
    const props = Object.assign({}, chord.dataset);
    const categories = JSON.parse(props.categories);
    const tags = JSON.parse(props.tags);
    const articles = JSON.parse(props.posts);
    ReactDOM.render(<App categories={categories} tags={tags} articles={articles}/>, document.getElementById('app'));
}
