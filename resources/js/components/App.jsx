import Chord from './Chord';
import '../../css/app.css';
import React, { useState } from 'react';
import ReactDOM from 'react-dom';


function App(props) {

    const [hide, setHide] = useState('');
    const url = '/ok';

    const categories = props.categories;

    const colors = categories.map((category) => (
        category.style
    ))

    const keys = categories.map(category => (
        category.name
    ))

    var counts = categories.map(category => (
        category.posts_count
    ))

    console.log(counts);

    var lenght = keys.length;

    var matrix = [];

    for (let i = 0; i < lenght; i++) {
        matrix.push(counts);
    }

    console.log(matrix);


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
        .then(hide => {
            this.setState({hide});
            console.log(this.setState());
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
