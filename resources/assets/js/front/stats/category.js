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
                <p>dolor sic amet mes couilles sur ton front</p>
            </div>
        )
    }
}