<?php

namespace Source\Support;

/**
 * SMSUB | Class Message
 *
 * @author Rodolfo Romaioli Ribeiro de Jesus <rodolfo.romaioli@gmail.com>
 * @package Source\Core
 */

class Modal
{

    /** @var string */
    public $idModal;

    /** @return string */
    public function getIdModal(): ?string
    {
        return $this->idModal;
    }

    public function renderModal(): string
    {
        return "<div class='modal fade' id='{$this->getIdModal()}' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                    <div class='modal-dialog'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <h5 class='modal-title' id='exampleModalLabel'>Teste</h5>
                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                            </div>
                            <div class='modal-body'>
                                ...
                            </div>
                            <div class='modal-footer'>
                                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                                <button type='button' class='btn btn-primary'>Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>";
    }
}