<?php
namespace Mris\MrisCatalogue\Tests\Unit\Controller;
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2017 Richard Morgane 
 *  			Inthavixay Stéphane 
 *  			
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Test case for class Mris\MrisCatalogue\Controller\ValeurCaracteristiqueController.
 *
 * @author Richard Morgane 
 * @author Inthavixay Stéphane 
 */
class ValeurCaracteristiqueControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{

	/**
	 * @var \Mris\MrisCatalogue\Controller\ValeurCaracteristiqueController
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = $this->getMock('Mris\\MrisCatalogue\\Controller\\ValeurCaracteristiqueController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllValeurCaracteristiquesFromRepositoryAndAssignsThemToView()
	{

		$allValeurCaracteristiques = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$valeurCaracteristiqueRepository = $this->getMock('Mris\\MrisCatalogue\\Domain\\Repository\\ValeurCaracteristiqueRepository', array('findAll'), array(), '', FALSE);
		$valeurCaracteristiqueRepository->expects($this->once())->method('findAll')->will($this->returnValue($allValeurCaracteristiques));
		$this->inject($this->subject, 'valeurCaracteristiqueRepository', $valeurCaracteristiqueRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('valeurCaracteristiques', $allValeurCaracteristiques);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenValeurCaracteristiqueToView()
	{
		$valeurCaracteristique = new \Mris\MrisCatalogue\Domain\Model\ValeurCaracteristique();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('valeurCaracteristique', $valeurCaracteristique);

		$this->subject->showAction($valeurCaracteristique);
	}
}
