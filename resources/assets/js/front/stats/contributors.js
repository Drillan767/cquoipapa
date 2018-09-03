import React from 'react';

export default class Contributors extends React.Component {
    render() {

        const { lang, contr } = this.props;

        return (
            <div className="stat">
                <div className="second">
                    <p>{ contr }</p>
                </div>
                <h4>{lang === 'fr' ? 'Contributeurs' : 'Contributors'}</h4>
                <p>Nous aident chaque jour afin d'étendre notre capacité de reconnaissance</p>
            </div>
        )
    }
}