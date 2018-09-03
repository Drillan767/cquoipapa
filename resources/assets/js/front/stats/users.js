import React from 'react';

export default class Users extends React.Component {

    render() {

        const { lang, images } = this.props;

        return (
            <div className="stat">
                <div className="fourth">
                    <p>{ images }</p>
                </div>

                <h4>{lang === 'fr' ? 'Utilisateurs' : 'Users'}</h4>
                <p>Profitent de nos services.<br /> Soyez l'un d'entre eux !</p>

            </div>
        )
    }
}