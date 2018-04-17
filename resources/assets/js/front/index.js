import React from 'react';
import ReatDOM from 'react-dom';

class Index extends React.Component {
    render() {
        return <h1>Bonjour !</h1>
    }
}

ReatDOM.render(
    <Index />,
    document.getElementById('front')
);