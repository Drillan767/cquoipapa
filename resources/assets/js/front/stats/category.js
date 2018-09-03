import React from 'react';

export default class Category extends React.Component {

    render() {

        const { lang, categories } = this.props;

        return (
            <div className="stat">
                <div className="third">
                    <p>{ categories }</p>
                </div>

                <h4>{lang === 'fr' ? 'Catégories' : 'Categories'}</h4>
                <p>Établies afin d'apporter une plus grande précision dans la reconnaissance d'image</p>
            </div>
        )
    }
}