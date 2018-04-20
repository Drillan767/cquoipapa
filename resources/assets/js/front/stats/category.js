import React from 'react';

export default class Category extends React.Component {

    render() {

        const { lang } = this.props;

        return (
            <div className="stat">
                <div className="third">
                    <p>1234</p>
                </div>

                <h4>{lang === 'fr' ? 'Catégories' : 'Categories'}</h4>
                <p>Proin eleifend fringilla dolor, non bibendum nisl.</p>
            </div>
        )
    }
}