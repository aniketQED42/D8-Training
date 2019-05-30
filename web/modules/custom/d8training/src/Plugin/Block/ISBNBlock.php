<?php

namespace Drupal\d8training\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Component\Serialization\Json;
use AntoineAugusti\Books\Fetcher;
use GuzzleHttp\Client;

/**
 * Provides a 'ISBN' Block.
 *
 * @Block(
 *   id = "isbn_block",
 *   admin_label = @Translation("ISBN block"),
 *   category = @Translation("Block that accpets the ISBN number and displays book info"),
 * )
 */
class ISBNBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $config = $this->getConfiguration();

    $form['isbn'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Enter The ISBN Number :'),
      '#required' => TRUE,
    ];
    return $form;
  }

  public function blockSubmit($form, FormStateInterface $form_state){    
    $this->setConfigurationValue('isbn',$form_state->getValue('isbn'));      
  }

  public function build() {
    $client = new Client(['base_uri' => 'https://www.googleapis.com/books/v1/']);
    $fetcher = new Fetcher($client);
    $config = $this->getConfiguration();
    $isbn = ($config['isbn']);
    $book = $fetcher->forISBN($isbn);
    print_r($book);
  }

}