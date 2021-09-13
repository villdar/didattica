import Chord from './Chord';
import '../../css/app.css';
import React, { useState } from 'react';
import ReactDOM from 'react-dom';


function App(props) {


    const [hide, setHide] = useState('');
    const url = '/category';

    const categories = props.categories;

    const colors = categories.map((category) => (
        category.style
    ))

    const keys = categories.map(category => (
        category.name
    ))

    const counts = categories.map(category => (
        category.posts_count
    ))


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

    function hideOnClick(id) {
      setHide({value: id})
      console.log(id);
      const body = {
          'chordId' : id,
      }

      const requestMetadata = {
          method: 'POST',
          headers: {
              'Content-Type': 'application/json'
          },
          body: JSON.stringify(body)
        };
        console.log(body);

      fetch(url, requestMetadata)
        .then(res => res.json())
        .then(res => {
            this.setState({
                url: res
            })
            console.log(res);
        })
    }

  return (
    <div className="App">
        <div style={{ height: 600 }}>
            <Chord hideOnClick={hideOnClick} keys={keys} colors={colors} matrix={matrix}/>
        </div>
    </div>
  )
}

export default App

if (document.getElementById('app')) {
    const chord = document.getElementById('app')
    const props = Object.assign({}, chord.dataset)
    const categories = JSON.parse(props.categories);
    ReactDOM.render(<App categories={categories}/>, document.getElementById('app'));
}
