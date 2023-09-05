import Chord from './Chord';
import '../../css/app.css';
import React, { useState } from 'react';
import ReactDOM, { render } from 'react-dom';
import axios from 'axios';
import Radium, { StyleRoot } from 'radium';


function App(props) {


    const [hide, setHide] = useState('');
    const url = '/category';

    const tags = props.tags;

    const categories = props.categories;

    const colors = categories.map((category) => (
        category.style
    ))

    const tag_keys = tags.map(tags => (
        tags.category_id
    ))

    const keys = categories.map(category => (
        category.name
    ))

    const counts = categories.map(category => (
        category.posts_count
    ))

    const tag_counts = tags.map(tags => (
        tags.posts_count
    ))

    const style = {
      // Adding media querry..
      '@media (max-width: 600px)': {
        height: '400px',
      },
      '@media (min-width: 992px)': {
        height: '830px',
      },
    };


    // function listToMatrix(list) {
    //     var matrix = [];
    //     for ( let i = 0;  i < list.length;  i++) {
    //         matrix[i] = [];

    //         for (let j = 0; j < list.length; j++) {
    //             matrix[i][j] = i == j ? list[i] : 0;
    //         }
    //     }

	//     return matrix;
    // }



    var matrix = counts.map((el, i) => [...counts].fill(0).fill(el, i, i + 1));
    var matrix_tag = counts.map((el, i) => [...tag_counts].fill(0).fill(el, i, i + 1));

    if (matrix.length !== matrix_tag.length || matrix[0].length !== matrix_tag[0].length) {
    throw new Error('Le dimensioni delle matrici non corrispondono');
    }

    var combinedMatrix = matrix.map((row, i) =>
        row.map((cell, j) => cell + matrix_tag[i][j])
    );

    console.log(combinedMatrix);

    function hideOnClick(id) {
      setHide({value: id})
      const body = {
          'chordId' : id,
      }

    //   response => JSON.stringify(response.data),
      // window.location.reload()
      axios.post(url, body)
      .then(function(response){
            // Create a new element
            var newNode = document.createElement('div');

            // Add ID and content
            newNode.id = 'chord_id';
            newNode.innerHTML = response.data;
            var currentNode = document.querySelector('#chord_id');
            currentNode.replaceWith(newNode);

        })
        .catch(error => {
            console.log("ERROR:: ",error.response);
        });

    //   const requestMetadata = {
    //       method: 'POST',
    //       headers: {
    //           'Content-Type': 'application/json'
    //       },
    //       body: JSON.stringify(body)
    //     };
    //     console.log(body);

    //   fetch(url, requestMetadata)
    //     .then(res => res.json())
    //     .then(res => {
    //         this.setState({
    //             url: res
    //         })
    //         console.log(res);
    //     })
    }

  return (
      <StyleRoot>
        <div className="App">
            <div style={style}>
                <Chord hideOnClick={hideOnClick} keys={tag_keys} colors={colors} matrix={combinedMatrix}/>
            </div>
        </div>
      </StyleRoot>
  )
}

export default App

if (document.getElementById('app')) {
    const chord = document.getElementById('app')
    const props = Object.assign({}, chord.dataset)
    const categories = JSON.parse(props.categories);
    ReactDOM.render(<App categories={categories}/>, document.getElementById('app'));
}
